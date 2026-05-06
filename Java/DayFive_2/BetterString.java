import java.util.*;

@FunctionalInterface 
interface StringCheck {
    boolean isBetter(String s1, String s2);
}

class StringUtils {
    public static String betterString(String s1, String s2, StringCheck check){
        if(check.isBetter(s1, s2)) 
            return s1;
        else 
            return s2;
    }
}

public class BetterString {
    public static void main(String args[]){
        String string1 = "Hi";
        String string2 = "HelloWorld!";
        
        String longer = StringUtils.betterString(string1, string2, (a, b) -> a.length() > b.length());
        
        String first = StringUtils.betterString(string1, string2, (a, b) -> a.compareTo(b) <0);
        
        System.out.println("Longer String is: " + longer);
        System.out.println("first String is: " + first);
    
    }
}
