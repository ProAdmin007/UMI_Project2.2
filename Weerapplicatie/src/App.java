import java.io.BufferedReader;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.LinkedList;
import java.util.Queue;
import java.util.Date;
/**
 * 
 * @author Justin Molema 402638 
 */
public class App
{
    public static void main(String[] args) throws Exception 
    {
        App app = new App();
        System.out.println("Starting application");
        app.runApp();
        
    }

    // running application
    public void runApp()
    {
        // creates new server socket with the used port
        try(ServerSocket serversocket = new ServerSocket(6667)) 
        {
            while (true) 
            {
                // starts new receiver everytime new data arrives
                Socket socket = serversocket.accept();
                new Receiver(socket).start();
            }
        }
        catch(Exception e)
        {

        }
    }

}
