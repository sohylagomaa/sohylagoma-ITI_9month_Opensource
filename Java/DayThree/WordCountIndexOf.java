public class WordCountIndexOf {
	public static void main(String args[]) {
		String sentence = "java is fun and java is powerful";
		String word = "java";
		
		int count = 0;
		int index=sentence.indexOf(word);

		while(index != -1) {
			count++;
			sentence = sentence.substring(index + word.length());
			index=sentence.indexOf(word);
		}
		System.out.println("Ocurrences: " + count);
	}
}
