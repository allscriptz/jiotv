/*

Use it only for personal use. Mail to the address below for support, if necessary.
Contributed by: allscripts@protonmail.com


*/


package token;

import token.aos;
/*
Taken from JioTV p000.aos
*/

import java.io.*;
import java.net.*;

public class runner{
public static void main(String args[])
{
aos s=new aos();

String aa="AQIC5wM2LY4Sfcw41MgI8_pcrWhihKiBPYyAhCtMTN5pN0s.*AAJTSQACMDIAAlNLABQtMzAzMzcxMTIyNjc5Mjc3ODA1MAACUzEAAjAz*";

String bb="";

try {

        URL url = new URL("https://tv.media.jio.com/apis/v1.3/beginsession/begin?langId=6");
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setDoOutput(true);
        conn.setRequestMethod("GET");
        conn.setRequestProperty("Content-Type", "application/json");

        BufferedReader br = new BufferedReader(new InputStreamReader(
                (conn.getInputStream())));

       
        while ((output = br.readLine()) != null) {
output=output.substring(output.indexOf("tid\":")+6);
bb=output.substring(0,output.length()-3);
//System.out.println(bb);
        }

        conn.disconnect();



      } catch (Exception e) {

        e.printStackTrace();

     }


s.m13418c(aa);
s.m13419d(bb);
s.mo1746a(3600);

String uurl=s.mo1745a("http://smumcdnems01.cdnsrv.jio.com/jiotv.live.cdn.jio.com/" + args[0] +  "/" + args[0] + "_400.m3u8");

System.out.println(uurl.split("m3u8")[1].toString());


}

}
