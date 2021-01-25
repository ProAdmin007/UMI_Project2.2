import java.io.*;  
import java.net.*;  
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
        // TODO: hier een timer ofzo van maken, voor nu is het een input ding
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
        String s = "";
        while(s != "exit")
        {
            s = reader.readLine();
            if(s.equals("send"))
            {
                System.out.println("sending...");
                String[] tosend = xmlParser.runParser();
                for (String string : tosend) {
                    sendToServer(string);
                }
            }
        }
    }
    
    private void sendToServer(String tosend)
    {
        try
        {      
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