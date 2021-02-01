import java.io.*;  
import java.net.*;  
public class Server 
{
    public static void main(String[] args)
    {  
        Server server = new Server();
        server.createTextfile();
        while(true)
        {
            server.runProgram();
        }
    }
    
    private void runProgram()
    {
            receiveData();
    }

    private void receiveData()
    {
        try
        {  
        ServerSocket ss=new ServerSocket(6666);  
        Socket s=ss.accept();//establishes connection   
        DataInputStream dis=new DataInputStream(s.getInputStream());  
        String  str=(String)dis.readUTF();
        ss.close();
        writeToTextfile(str);
        // decrypten  
        System.out.println(str);
          
          
        }
        catch(Exception e){System.out.println(e);}  
    }

    private void createTextfile()
    {
        try {
            // change directory on VM
            File myObj = new File("D:/Hanze/2.2 project leertaak 3/serveroutput.txt");
            if (myObj.createNewFile()) {
              System.out.println("File created: " + myObj.getName());
            } else {
              System.out.println("File already exists.");
            }
          } catch (IOException e) {
            System.out.println("An error occurred.");
            e.printStackTrace();
          }
    }

    private void writeToTextfile(String towrite)
    {
        try {
            // change directory on VM
            FileWriter myWriter = new FileWriter("D:/Hanze/2.2 project leertaak 3/serveroutput.txt", true);
            myWriter.append(towrite);
            myWriter.close();
            System.out.println("Successfully wrote to the file.");
          } catch (IOException e) {
            System.out.println("An error occurred.");
            e.printStackTrace();
          }
    }
}  