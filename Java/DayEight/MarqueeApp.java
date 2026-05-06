import javax.swing.*;
import java.awt.*;

public class MarqueeApp extends JFrame implements Runnable {
    String message = "Java World";
    int x = 0; 
    int y = 150; 
    Thread th;

    public MarqueeApp() {
        this.setTitle("Banner Application :)");
        this.setSize(400, 300);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        
        th = new Thread(this);
        th.start();
    }

    @Override
    public void paint(Graphics g) {
        super.paint(g); 
        
        g.setFont(new Font("Arial", Font.BOLD, 16));
        g.drawString(message, x, y);
    }

    @Override
    public void run() {
        while (true) {
            try {
                x += 10;

                if (x > this.getWidth()) {
                    x = -50; 
                }
                repaint();
                Thread.sleep(200); 
                
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    public static void main(String[] args) {
        MarqueeApp app = new MarqueeApp();
        app.setVisible(true);
    }
}
