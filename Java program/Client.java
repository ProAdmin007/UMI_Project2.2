import java.io.*;  
import java.net.*;
import java.util.concurrent.Executors;
import java.util.concurrent.ScheduledExecutorService;
import java.util.concurrent.TimeUnit;  

public class Client {
    
    XmlParser xmlParser;
    public static void main(String[] args) throws IOException 
    {
        Client client = new Client();
        client.runProgram();
    } 
    
    private void runProgram() throws IOException
    {
        xmlParser = new XmlParser();
        
        final ScheduledExecutorService ses = Executors.newSingleThreadScheduledExecutor();
        ses.scheduleWithFixedDelay(new Runnable() {
            @Override
            public void run() {
                System.out.println("sending...");
                String send = xmlParser.runParser();
                sendToServer(send);
            }
        }, 0, 1, TimeUnit.SECONDS); // timer for 1 second
    }

    private void sendToServer(String tosend)
    {
        try
        {
        // CHANGE ON VM
        Socket s=new Socket("localhost",6666);  
        DataOutputStream dout=new DataOutputStream(s.getOutputStream());
        String st = tosend;
        // encrypten  
        dout.writeUTF(st);  
        dout.flush();  
        dout.close();  
        s.close();  
        }
        catch(Exception e){System.out.println(e);}  
    }

    
}  