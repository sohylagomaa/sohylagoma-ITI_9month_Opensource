public class BinarySearch {
   public static void main(String args[]){
         int arr [] ;
         arr = new int [1000];
         for(int i=0; i<arr.length; i++){
            arr[i] = i+1;
         }
         int target  = 1000;
         long startTime = System.nanoTime();
         
         int low =0;
         int high = arr.length -1;
         int idx = -1;
         while(low <= high){
            int mid = (low + high) /2;
            if(target == arr[mid]){
               idx = mid;
               break;
            }
            else if(arr[mid] < target) {
                low = mid +1;
            }
            else {
                high = mid -1;
            }
         }
         
         long endTime = System.nanoTime();
         
        System.out.println("Founded At: " + idx);
        System.out.println("Time: " + (endTime - startTime));
         
   
   }

}
