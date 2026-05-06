import java.util.function.Function;


class CalcDelta implements Function<Double[], Double> {
    @Override
    public Double apply(Double[] coeffs) {
        Double a = coeffs[0];
        Double b = coeffs[1];        
        Double c = coeffs[2];  
        return b * b - 4 * a * c;
    }
}


class QuadraticRoot implements Function<Double[], Double[]> {
    @Override
    public Double[] apply(Double[] coeffs) {
        Double a = coeffs[0];
        Double b = coeffs[1];        
        Double c = coeffs[2]; 
        
        
        CalcDelta deltaCalculator = new CalcDelta();
        Double delta = deltaCalculator.apply(coeffs);
        
        
        if (delta < 0) return new Double[]{};
        
        Double sqrtDelta = Math.sqrt(delta);
        Double x1 = (-b + sqrtDelta) / (2 * a);
        Double x2 = (-b - sqrtDelta) / (2 * a);
        
        return new Double[]{x1, x2};
    }
}


public class QuadraticSolver {
    public static void main(String[] args) {
        Double[] coeffs = {1.0, -3.0, 2.0}; 

        QuadraticRoot rootCalculator = new QuadraticRoot();
        Double[] roots = rootCalculator.apply(coeffs);
        
        if (roots.length == 0) {
            System.out.println("No real roots.");
        } 
        else {
            System.out.println("Root 1 = " + roots[0]);
            System.out.println("Root 2 = " + roots[1]);
        }
    }
}

