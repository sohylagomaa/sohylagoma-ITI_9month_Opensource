import java.util.List;
import java.util.ArrayList;

abstract class Shape {
    public abstract void draw();
}

class Rectangle extends Shape {
    @Override
    public void draw(){
        System.out.println("Draw Rectangle");
    }
}

class Circle extends Shape {
    @Override
    public void draw(){
        System.out.println("Draw Circle");
    }
}

public class ShapeTest {
    public static void drawShapes(List<? extends Shape> shapes){
        for(Shape sh:shapes){
            sh.draw();
        }
    }

    public static void main(String args[]){
        ArrayList<Shape> shapes = new ArrayList<>();
        shapes.add(new Rectangle());
        shapes.add(new Circle());
        
        drawShapes(shapes);
    
    }
}
