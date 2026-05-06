import javax.swing.*;
import java.awt.*;

public class MovingBall extends JFrame implements Runnable {

    int x = 100, y = 100;
    int dx = 5, dy = 5;
    int ballSize = 60; 
    
    Image ballImage;
    Thread th;

    public MovingBall() {
        this.setTitle("Moving Ball Application");
        this.setSize(600, 400);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        

        ballImage = Toolkit.getDefaultToolkit().getImage("ball.png");

        th = new Thread(this);
        th.start();
    }

    @Override
    public void paint(Graphics g) {
        super.paint(g);
        
        if (ballImage != null) {
            g.drawImage(ballImage, x, y, ballSize, ballSize, this);
        }
    }

    @Override
    public void run() {
        while (true) {
            try {
                x += dx;
                y += dy;

                if (x <= 0 || x + ballSize >= this.getWidth()) {
                    dx = -dx; 

                    if(x + ballSize > this.getWidth()) x = this.getWidth() - ballSize;
                    if(x < 0) x = 0;
                }


                if (y <= 0 || y + ballSize >= this.getHeight()) {
                    dy = -dy;
                    
                    if(y + ballSize > this.getHeight()) y = this.getHeight() - ballSize;
                    if(y < 0) y = 0;
                }

                repaint();
                Thread.sleep(60);
                
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    public static void main(String[] args) {
        MovingBall app = new MovingBall();
        app.setVisible(true);
    }
}
