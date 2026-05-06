public class CheckValue {
  public static void main(String args[]){
      if(args.length == 0)
        	System.out.println("no input provided");
      else{
          System.out.println("The Entered Values is: " );
          for(int i=0; i<args.length; i++){
            	System.out.println(args[i]);
          }
      }
   }
}
