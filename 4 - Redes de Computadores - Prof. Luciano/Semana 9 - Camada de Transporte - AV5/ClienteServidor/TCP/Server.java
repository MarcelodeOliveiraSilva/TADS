import java.net.*;
import java.io.*;
public class Server {
	public static void main(String[] args) {
		try{
			ServerSocket s = new ServerSocket(9990);
			String str;
			while(true){
				System.out.println("Aguardando Conexao:");
				Socket c = s.accept();
				System.out.println("Cliente Conectado:");
				InputStream i = c.getInputStream();
				OutputStream o = c.getOutputStream();
				do{
					System.out.println("Pronto Servidor:");
					byte [] line = new byte[100];
					System.out.println("Aguardo Mensagem:");
					i.read(line);
					o.write(line);
					str = new String(line);
					
				}while(!str.trim().equals("bye"));
				c.close();
			}
		}
		catch (Exception err){
			System.err.println(err);
		}

	}

}
