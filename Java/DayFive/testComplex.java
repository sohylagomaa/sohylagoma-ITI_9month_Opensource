class Complex<T extends Number> {
    private T real;
    private T imaginary;
    
    public Complex(T real, T imaginary) {
        this.real = real;
        this.imaginary = imaginary;
    }
    
    public Complex<Double> add(Complex<? extends Number> other) {
    
        double realSum = this.real.doubleValue() + other.real.doubleValue();
        
        double imagSum = this.imaginary.doubleValue() + other.imaginary.doubleValue();
        
        return new Complex<>(realSum, imagSum);
    }
    
    public Complex<Double> subtract(Complex<? extends Number> other) {
        double realDiff = this.real.doubleValue() - other.real.doubleValue();
        double imagDiff = this.imaginary.doubleValue() + other.imaginary.doubleValue();
        
        return new Complex<>(realDiff, imagDiff);
    }
    
    @Override
    public String toString() {
          return real + " + " + imaginary + "i";
    }
}


public class testComplex {

    public static void main(String[] args) {

        Complex<Double> c1 = new Complex<>(5.1, 3.1);
        Complex<Double>  c2 = new Complex<>(2.5, 1.5);

        Complex<Double> sum = c1.add(c2);
        Complex<Double> diff = c1.subtract(c2);

        System.out.println("Addition Result: " + sum);
        System.out.println("Subtraction Result: " + diff);
    }
}

