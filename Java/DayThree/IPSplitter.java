public class IPSplitter {
    public static void main(String args[]) {
         if (args.length == 0) {
            System.out.println("Please provide an IP address as argument.");
            return;
         }
         String ip = args[0];
         String ipRegex = "^([0-9]{1,3}\\.){3}[0-9]{1,3}$";
         
         if(ip.matches(ipRegex)) {
            String parts[] = ip.split("\\.");
            System.out.println("IP Parts:");
            
            for(int i=0; i<parts.length; i++) {
                System.out.println(parts[i]);
            }
         }
         else {
            System.out.println("Invalid IP address");
         }
    
    }
}
