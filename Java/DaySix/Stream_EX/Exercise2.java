

import java.util.Comparator;
import java.util.Map;
import java.util.Optional;
import java.util.function.BiConsumer;
import java.util.stream.Collector;
import java.util.stream.Collectors;
import java.util.List;


public class Exercise2 {

    public static void main(String[] args) {
        CountryDao countryDao = InMemoryWorldDao.getInstance();

       countryDao.findAllCountries()
                .stream()
                .collect(Collectors.groupingBy(
                        Country::getContinent, 
                        Collectors.flatMapping(
                                country -> country.getCities().stream(),
                                Collectors.maxBy(Comparator.comparingLong(City::getPopulation))
                        )
                ))
                .forEach((continent, highestCityOpt) -> 
                        highestCityOpt.ifPresent(city -> System.out.println(
                                continent + " ==> " + city.getName() + " (" + city.getPopulation() + ")"
                        ))
                );
    }
}

