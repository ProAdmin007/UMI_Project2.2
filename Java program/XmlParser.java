//package com.tutorialspoint.xml;

import java.io.File;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.NodeList;
import org.w3c.dom.Node;
import org.w3c.dom.Element;
import javax.xml.transform.OutputKeys;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpression;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;
import java.io.StringWriter;
import java.util.ArrayList;

public class XmlParser {

    public String getNodeString(Node node) {
        try {
            StringWriter writer = new StringWriter();
            Transformer transformer = TransformerFactory.newInstance().newTransformer();
            transformer.transform(new DOMSource(node), new StreamResult(writer));
            String output = writer.toString();
            return output.substring(output.indexOf("?>") + 2);// remove <?xml version="1.0" encoding="UTF-8"?>
        } catch (TransformerException e) {
            e.printStackTrace();
        }
        return node.getTextContent();
    }

    public String stripxmltags(String string) {
        char[] characters = string.toCharArray();
        String toreturn = "";
        Boolean shouldDelete = true;
        for (int i = 0; i < characters.length; i++) {
            if (shouldDelete) {
                if (characters[i] == '>') {
                    shouldDelete = false;
                }
            } else {
                if (characters[i] == '<') {
                    shouldDelete = true;
                } else {
                    toreturn += characters[i];
                }
            }
        }
        return toreturn;
    }

    public String[] runParser() {
        ArrayList<String> stringarraylist = new ArrayList<>();
        try {
            File inputFile = new File("output.xml");
            DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
            Document doc = dBuilder.parse(inputFile);
            doc.getDocumentElement().normalize();
            System.out.println("Root element :" + doc.getDocumentElement().getNodeName());
            NodeList nList = doc.getElementsByTagName("MEASUREMENT");
            System.out.println("----------------------------");

            for (int temp = 0; temp < nList.getLength(); temp++) {
                Node nNode = nList.item(temp);
                System.out.println("\nCurrent Element :" + nNode.getNodeName());

                if (nNode.getNodeType() == Node.ELEMENT_NODE) {
                    Element eElement = (Element) nNode;

                    String STN = getNodeString(eElement.getElementsByTagName("STN").item(0));
                    String DATE = getNodeString(eElement.getElementsByTagName("DATE").item(0));
                    String TIME = getNodeString(eElement.getElementsByTagName("TIME").item(0));
                    String TEMP = getNodeString(eElement.getElementsByTagName("TEMP").item(0));
                    String DEWP = getNodeString(eElement.getElementsByTagName("DEWP").item(0));
                    String STP = getNodeString(eElement.getElementsByTagName("STP").item(0));
                    String SLP = getNodeString(eElement.getElementsByTagName("SLP").item(0));
                    String VISIB = getNodeString(eElement.getElementsByTagName("VISIB").item(0));
                    String WDSP = getNodeString(eElement.getElementsByTagName("WDSP").item(0));
                    String PRCP = getNodeString(eElement.getElementsByTagName("PRCP").item(0));
                    String SNDP = getNodeString(eElement.getElementsByTagName("SNDP").item(0));
                    String FRSHTT = getNodeString(eElement.getElementsByTagName("FRSHTT").item(0));
                    String CLDC = getNodeString(eElement.getElementsByTagName("CLDC").item(0));
                    String WNDDIR = getNodeString(eElement.getElementsByTagName("WNDDIR").item(0));

                    STN = stripxmltags(STN);
                    DATE = stripxmltags(DATE);
                    TIME = stripxmltags(TIME);
                    TEMP = stripxmltags(TEMP);
                    DEWP = stripxmltags(DEWP);
                    STP = stripxmltags(STP);
                    SLP = stripxmltags(SLP);
                    VISIB = stripxmltags(VISIB);
                    WDSP = stripxmltags(WDSP);
                    PRCP = stripxmltags(PRCP);
                    SNDP = stripxmltags(SNDP);
                    FRSHTT = stripxmltags(FRSHTT);
                    CLDC = stripxmltags(CLDC);
                    WNDDIR = stripxmltags(WNDDIR);

                    stringarraylist.add(STN);
                    stringarraylist.add(DATE);
                    stringarraylist.add(TIME);
                    stringarraylist.add(TEMP);
                    stringarraylist.add(DEWP);
                    stringarraylist.add(STP);
                    stringarraylist.add(SLP);
                    stringarraylist.add(VISIB);
                    stringarraylist.add(WDSP);
                    stringarraylist.add(PRCP);
                    stringarraylist.add(SNDP);
                    stringarraylist.add(FRSHTT);
                    stringarraylist.add(CLDC);
                    stringarraylist.add(WNDDIR);
                }
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
        
        String[] stringarray = new String[stringarraylist.size()];
        for (int i = 0; i < stringarraylist.size(); i++) 
            stringarray[i] = stringarraylist.get(i);
        return stringarray;
    }

}
