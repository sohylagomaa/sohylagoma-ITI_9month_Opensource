public class WordCountSplit{
     public static void main(String args[]){
		    String sentence = "java is fun and java is powerful";
		    String word = "java";

		    String parts[] = sentence.split(word,-1);

		    int count = parts.length - 1;
		    System.out.println("Occurences: "+ count);

     }
}
