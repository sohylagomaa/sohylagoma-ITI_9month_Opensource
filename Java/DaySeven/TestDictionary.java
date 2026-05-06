import java.util.*;

class WordDictionary {
    private Map<Character, List<String>> dictionary = new HashMap<>(); 
    
    public void addWord(String word){
        if(word == null || word.isEmpty())
              return;
        word = word.toLowerCase();
        char key = word.charAt(0);
        
        if(!dictionary.containsKey(key)){
            dictionary.put(key, new ArrayList<>());
        }
        dictionary.get(key).add(word);
        
        Collections.sort(dictionary.get(key));
    }
    
    public void printAll(){
        for(char key : dictionary.keySet()){
            System.out.println(key + ":" + dictionary.get(key));
        }
    }
    
    public void printWordsOfLetter(char letter) {
        letter = Character.toLowerCase(letter);
        if(dictionary.containsKey(letter)){
            System.out.println(letter + ":" + dictionary.get(letter));
        }else {
            System.out.println("no words for letter "+ letter);
        }
    }
}
public class TestDictionary {
    public static void main(String args[]){
        WordDictionary dic = new WordDictionary();
        
        dic.addWord("apple");
        dic.addWord("ant");
        dic.addWord("ball");        
        dic.addWord("cat");
        
        dic.printAll();
        
        System.out.println();
        dic.printWordsOfLetter('a');
    }

}
