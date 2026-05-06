public class Display{
  public static void main(String args[]){
	    if(args.length < 2){
	       System.out.println("please Enter number and string");
	       return;
      }

	    int num = Integer.parseInt(args[0]);
	    String text = args[1];

	    for(int i=0; i<num; i++){
	        System.out.println(text);
	    }
  }
}
