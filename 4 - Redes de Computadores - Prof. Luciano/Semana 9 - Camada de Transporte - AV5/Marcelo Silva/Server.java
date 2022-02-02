import java.net.*;
import java.util.HashSet;
 
public class Server {	
 
	private static HashSet<Integer> portSet = new HashSet<Integer>();
 
	public static void main(String args[]) throws Exception {
 
        int serverport = 10000;        
 
        if (args.length < 1) {
            System.out.println("Servidor iniciando na porta: " + serverport);
        } else {            
            serverport = Integer.valueOf(args[0]).intValue();
            System.out.println("Servidor iniciando na porta: " + serverport);
        }
 
	    DatagramSocket udpServerSocket = new DatagramSocket(serverport);        
 
	    System.out.println("Servidor Iniciado...\n");
 
	    while(true){
			byte[] recebeArquivo = new byte[1024];          
 
			DatagramPacket receivePacket = new DatagramPacket(recebeArquivo, recebeArquivo.length);
 
			udpServerSocket.receive(receivePacket);           
 
			String clientMessage = (new String(receivePacket.getData())).trim();

			InetAddress clientIP = receivePacket.getAddress();           
 
			int clientport = receivePacket.getPort();
			System.out.println("Adicionando  "+clientport);
			portSet.add(clientport);
 
	
			String returnMessage = clientMessage.toUpperCase();          
			System.out.println(returnMessage);
			byte[] sendData  = new byte[1024];
 
			sendData = returnMessage.getBytes();
			
			for(Integer port : portSet){
				if(port != clientport){
					DatagramPacket sendPacket = new DatagramPacket(sendData, sendData.length, clientIP, port); 
					System.out.println("Enviando...");
					udpServerSocket.send(sendPacket);    
				}
			}
        }
    }
}