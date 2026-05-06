import javax.swing.*;
import java.awt.*;
import java.util.Date;

public class DateTimeApp extends JFrame implements Runnable {
    Thread th;
    JLabel timeLabel = new JLabel();

    public DateTimeApp() {
        this.setTitle("Time & Date Application Thread");
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        
        timeLabel.setFont(new Font("Arial", Font.BOLD, 16));
        timeLabel.setHorizontalAlignment(JLabel.CENTER);
        this.add(timeLabel, BorderLayout.CENTER);
        
        th = new Thread(this);
        th.start();
    }

    @Override
    public void run() {
        try {
            while (true) {
                Date d = new Date();
                timeLabel.setText(d.toString());
                
                Thread.sleep(1000);
            }
        } catch (InterruptedException e) {
            System.out.println("Thread interrupted: " + e.getMessage());
        }
    }

    public static void main(String[] args) {
        DateTimeApp app = new DateTimeApp();
        app.setBounds(50, 50, 600, 400);
        app.setVisible(true);
    }
}
