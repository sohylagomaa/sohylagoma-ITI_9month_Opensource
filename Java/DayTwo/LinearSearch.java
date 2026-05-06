public class LinearSearch {
    public static void main(String args[]){
	        int arr[];
	        arr = new int [1000];
	        for(int i=0; i<arr.length; i++){
	            arr[i] = i+1;
	        }
	        int min = arr[0];
	        int max = arr[arr.length -1];

	        System.out.println("minimum = " + min);
	        System.out.println("maximum = " + max);

	        int target = 1000;
	        long startTime = System.nanoTime();
	        int idx = -1;
	        for(int i=0;i<arr.length; i++){
	            if(arr[i] == target){
	               idx = i;
		             break;
	            }
	        }
	        long endTime = System.nanoTime();

	        System.out.println("founded at:  " + idx);
	        System.out.println("Time =  " + (endTime - startTime));

    }
}
