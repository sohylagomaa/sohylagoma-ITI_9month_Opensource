import java.util.function.Function;

class CelsiusToFahrenheit implements Function<Double, Double> {
    @Override
    public Double apply(Double celsius){
        return (celsius * 9 / 5) + 32;
    }
}

public class TempratureConverter {
     public static void main(String args[]) {
          Function<Double, Double> converter = new CelsiusToFahrenheit();
          
          double celsius = 30.0;
          double fahrenheit = converter.apply(celsius);
          
          System.out.println("Centigrade: " + celsius);
          System.out.println("Fahrenheit: " + fahrenheit);
     }
}
