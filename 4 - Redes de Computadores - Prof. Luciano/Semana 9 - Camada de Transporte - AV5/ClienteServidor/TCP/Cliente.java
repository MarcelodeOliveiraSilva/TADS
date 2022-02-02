import java.net.*;
import java.io.*;
public class Cliente {
	public static void main(String[] args) {
		try{
			Socket c = new Socket("127.0.0.1", 9990);
			InputStream i = c.getInputStream();
			OutputStream o = c.getOutputStream();
			String str;
			do{
				byte [] line = new byte[100];
				System.out.println("Digite algo");
				System.in.read(line);
				o.write(line);
				i.read(line);
				str = new String(line);
				//System.out.println(str.trim());
				System.out.println(str);					
			}while(!str.trim().equals("bye"));
			c.close();
		
		}
		catch (Exception err){
			System.err.println(err);
		}
	}
}
