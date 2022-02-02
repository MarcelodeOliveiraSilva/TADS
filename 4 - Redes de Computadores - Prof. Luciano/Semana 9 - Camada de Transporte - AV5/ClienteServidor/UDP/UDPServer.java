import java.io.*;
import java.net.*;
 
class UDPServer {
	public static void main(String args[]) throws Exception {
 
		int porta = 9876;
		int numConn = 1;		
		DatagramSocket serverSocket = new DatagramSocket(porta);   //cria socket
		byte[] receiveData = new byte[1024];
		byte[] sendData = new byte[1024]; 
		while (true) { 
			DatagramPacket receivePacket = new DatagramPacket(receiveData,receiveData.length);  //Pacote de entrada
			System.out.println("Esperando por datagrama UDP na porta " + porta);
			serverSocket.receive(receivePacket);                           //lê o pacote recebido
			System.out.print("Datagrama UDP [" + numConn + "] recebido..."); 
			String sentence = new String(receivePacket.getData());
			System.out.println(sentence);			
			InetAddress IPAddress = receivePacket.getAddress();     //pega IP do Cliente
			int port = receivePacket.getPort();                     //pega Porta do Cliente
			String capitalizedSentence = sentence.toUpperCase(); 
			sendData = capitalizedSentence.getBytes(); 
			DatagramPacket sendPacket = new DatagramPacket(sendData,
					sendData.length, IPAddress, port);			    //monta o Datagram retorno
			System.out.print("Enviando " + capitalizedSentence + "..."); 
			serverSocket.send(sendPacket);                          //Envia o Datagram
			System.out.println("OK\n");
			numConn++;
		}
	}
}
