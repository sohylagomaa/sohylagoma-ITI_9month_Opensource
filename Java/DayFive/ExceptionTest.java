class MyCustomException extends Exception {
    public MyCustomException(String message) {
        super(message);
    }
}


class ExceptionThrower {
    public void checkAge(int age) throws MyCustomException {
        if(age < 18){
            throw new MyCustomException("Age must be above 17");
        }
        System.out.println("Age is valid");
    } 
    
     public void checkName(String name) throws MyCustomException {
        if(name ==null || name.length() < 3){
            throw new MyCustomException("Name must be at least three Charachters");
        }
        System.out.println("username is valid");
    } 
    public void checkSalary(int salary) throws MyCustomException {
        if(salary < 0){
            throw new MyCustomException("salary can't be negative");
        }
        System.out.println("Salary is valid");
    } 
}

public class ExceptionTest {
    public static void main(String args[]) {
        ExceptionThrower obj  = new ExceptionThrower();
        
        try{
            obj.checkAge(88);
            obj.checkName("ab");
            obj.checkSalary(-200);
        
        }catch(MyCustomException e){
            System.out.println("Exception: " + e.getMessage());
        
        }
    
    }

}

