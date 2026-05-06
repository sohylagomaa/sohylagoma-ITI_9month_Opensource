@FunctionalInterface 
interface StringChecker {
    boolean check(String str);
}

public class CheckAlphabet {

     public boolean isAlphaOnly(String str) {
            if (str == null || str.isEmpty())
                return false;
            for(char ch : str.toCharArray()){
                if(!Character.isLetter(ch))
                    return false;
            }     
            return true;
      }
        
    public static void main(String args[]){
    
        CheckAlphabet ch = new CheckAlphabet();
        
        StringChecker sc = ch::isAlphaOnly;
        
        String s1 = "HelloWord";
        String s2 = "HelloWord123";
        
        System.out.println(sc.check(s1));
        System.out.println(sc.check(s2));
    }
}

