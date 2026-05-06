import java.util.Objects;
import java.util.Optional;

import static java.lang.System.out;
import static java.util.Comparator.comparing;
import static java.util.stream.Collectors.maxBy;

public class Exercise5 {

    public static void main(String[] args) {
        CountryDao countryDao = InMemoryWorldDao.getInstance();
        CityDao cityDao = InMemoryWorldDao.getInstance();
        
        Optional<City> highestCapital = countryDao.findAllCountries()
                .stream()
                .map(country -> cityDao.findCityById(country.getCapital())) 
                .filter(Objects::nonNull) 
                .max(comparing(City::getPopulation));

      
        highestCapital.ifPresent(city ->
                out.println("Highest Capital ➜ " + city.getName() +
                        " (" + city.getPopulation() + ") in country: " +
                        Optional.ofNullable(countryDao.findCountryByCode(city.getCountryCode()))
                                .map(Country::getName)
                                .orElse("Unknown"))
        );
    }

}
