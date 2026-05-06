

import java.util.Comparator;
import java.util.List;
import java.util.Optional;
import java.util.stream.Collectors;


public class Exercise1 {

   public static void main(String[] args) {
      CountryDao countryDao= InMemoryWorldDao.getInstance();
      
      List<Country> countries = countryDao.findAllCountries();


      String result = countries.stream()
               .map(country -> country.getCities().stream()
                        .max(Comparator.comparingLong(City::getPopulation))
                        .map(city -> country.getName() + " ==> " + city.getName())
                        .orElse("")) 
               .filter(s -> !s.isEmpty()) 
               .collect(Collectors.joining("\n")); 


      System.out.println(result);
      
   }

}
