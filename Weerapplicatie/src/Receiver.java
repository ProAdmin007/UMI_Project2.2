import java.io.BufferedReader;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Date;
import java.util.LinkedList;
import java.util.Queue;
/**
 * 
 * @author Justin Molema 402638 
 */
public class Receiver extends Thread
{
    // the socket
    private Socket socket;
    // date, used for naming the files by the the date that they are being createrd
    Date date;
    // constructor to create this receiver, used for threading
    public Receiver(Socket socket)
    {
        this.socket = socket;
    }
    
    // run method gets called by the thread
    @Override
    public synchronized void run()
    {
      bufReader(socket);
    }

    // reads the data line by line
    private void bufReader(Socket socket)
    {
        try (BufferedReader in = new BufferedReader(new InputStreamReader(socket.getInputStream())))
        {
            String output = "";

            String line = "";
            while (true) 
            {
              line = in.readLine();
              output += (line + "\n");
              if (line.equals("</WEATHERDATA>")) 
              {
                date = new Date();
                //rawinput.add(out);
                String filename = date.toString() + "output.txt";
                // to fix the date
                filename = filename.replace(":", "^");
                filename = filename.replace(" ", "^");
                System.out.println(filename);
                //createTextfile(filename);
                //writeToTextfile(filename, out);
                
                createTextFile(filename, output);
                output = "";
              }
            }
          } 
          catch (Exception e) 
          { 
            e.printStackTrace();
          }
    }

    
    // writes the data to the text file
    private void writeToTextfile(String filename, String towrite)
    {
        try 
        {
            // change directory on VM "/mnt/nfs_clientweerdata/"
            FileWriter myWriter = new FileWriter("D:/Hanze/2.2 project leertaak 3/Java program v4/Weerapplicatie/" + filename, true);
            String s = towrite;
            
            String toremove = towrite.substring(0, 21);
            
            // gets rid of all xml tags and white spaces/tabs
            s = s.replaceAll("[\t\n\t]", "");
            s = s.replace(toremove, "");
            s = s.replace("   ", "");
            s = s.replace("</WEATHERDATA>", "");
            s = s.replace("<WEATHERDATA>", "");
            s = s.replace("<MEASUREMENT>", "");
            s = s.replace("</MEASUREMENT>", "");
            
            // replaces the xml tag to something more simple, with the $ character as saperator
            s = s.replace("<STN>", "STN$");
            s = s.replace("<DATE>", "DATE$");
            s = s.replace("<TIME>", "TIME$");
            s = s.replace("<TEMP>", "TEMP$");
            s = s.replace("<DEWP>", "DEWP$");
            s = s.replace("<STP>", "STP$");
            s = s.replace("<SLP>", "SLP$");
            s = s.replace("<VISIB>", "VISIB$");
            s = s.replace("<WDSP>", "WDSP$");
            s = s.replace("<PRCP>", "PRCP$");
            s = s.replace("<SNDP>", "SNDP$");
            s = s.replace("<FRSHTT>", "FRSHTT$");
            s = s.replace("<CLDC>", "CLDC$");
            s = s.replace("<WNDDIR>", "WNDDIR$");

            // another separator, this being *
            s = s.replace("</STN>", "*");
            s = s.replace("</DATE>", "*");
            s = s.replace("</TIME>", "*");
            s = s.replace("</TEMP>", "*");
            s = s.replace("</DEWP>", "*");
            s = s.replace("</STP>", "*");
            s = s.replace("</SLP>", "*");
            s = s.replace("</VISIB>", "*");
            s = s.replace("</WDSP>", "*");
            s = s.replace("</PRCP>", "*");
            s = s.replace("</SNDP>", "*");
            s = s.replace("</FRSHTT>", "*");
            s = s.replace("</CLDC>", "*");
            s = s.replace("</WNDDIR>", "\n");
            // appends to the file, and closes it
            myWriter.append(s);
            myWriter.close();
            
            System.out.println("Successfully wrote to the file.");
          } 
          catch (IOException e) 
          {
            System.out.println("An error occurred.");
            e.printStackTrace();
          }
        }

    // creates the text file
    private void createTextFile(String filename, String towrite)
    {
        try 
        {
            // change directory on VM "/mnt/nfs_clientweerdata/"
            
            File myObj = new File("D:/Hanze/2.2 project leertaak 3/Java program v4/Weerapplicatie/" + filename);
            if (myObj.createNewFile()) 
            {
              System.out.println("File created: " + myObj.getName());
              writeToTextfile(filename, towrite);
            } 
            else 
            {
              System.out.println("File already exists.");
              
              writeToTextfile(filename, towrite);
            }
          } 
          catch (IOException e) 
          {
            System.out.println("An error occurred.");
            e.printStackTrace();
          }
    }
}