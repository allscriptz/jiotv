package p000;

import p000.aos;
import java.io.*;
import java.net.*;

public class runner{
static class th extends Thread{  
public void run(){  
while(true){  

try{
try{
aos s=new aos();

String aa="AQIC5wM2LY4SfcxHc36UYaflp_Yyruqw2Evrxf8MO63IciE.*AAJTSQACMDIAAlNLABM0Mjc3NDQ2MjE5MzA4NjgyNzM2AAJTMQACMzY.*";


s.m13418c(aa);
s.m13419d();
s.mo1746a(3600);
String uurl=s.mo1745a("http://smumcdnems01.cdnsrv.jio.com/jiotv.live.cdn.jio.com/9XM/9XM_400.m3u8");

String tk=uurl.split("m3u8")[1].toString();

System.out.println(tk);

FileWriter f=new FileWriter("token.txt",false); 
f.write(tk);
f.close();


}catch(Exception e){

}
Thread.sleep(600000);

}catch(InterruptedException e){}  
    
}  
}}
  
public static void main(String args[]) 
{

th t1=new th();  
   
t1.start(); 

}

}