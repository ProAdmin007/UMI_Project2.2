import java.io.*;  
import java.net.*;  
public class Server 
{
    public static void main(String[] args)
    {  
        Server server = new Server();
        server.runProgram();
    }
    
    private void runProgram()
    {
        while(true)
        {
            receiveData();
        }
    }

    private void receiveData()
    {
        try
        {  
        ServerSocket ss=new ServerSocket(6666);  
        Socket s=ss.accept();//establishes connection   
        DataInputStream dis=new DataInputStream(s.getInputStream());  
        String  str=(String)dis.readUTF();
        // decrypten  
        System.out.println("message= "+str);  
        ss.close();  
        }
        catch(Exception e){System.out.println(e);}  
    }
}  