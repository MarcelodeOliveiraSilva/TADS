import java.io.*;
import java.net.*;
//import java.util.Scanner;
import java.io.BufferedReader;
import java.io.IOException;
 
public class Client {

/*
    public static String Nome(){
        Scanner ler = new Scanner(System.in);
        System.out.println("Seu Nome:");
        String n = ler.nextLine();
        return n;       
    }
*/

    public static void main(String args[]) throws Exception {  
 
        int clientport = 10000;
        String host = "localhost";
        //String nome = Client.Nome();

        if (args.length < 1) {
           System.out.println("Usuário "+ host +" conectou atraves da porta " + clientport);
        } else {      
           clientport = Integer.valueOf(args[0]).intValue();
           System.out.println("Usuário "+ host +" conectou atraves da porta " + clientport);
        }
        
        InetAddress ia = InetAddress.getByName(host);

        SenderThread sender = new SenderThread(ia, clientport);
        sender.start();
        ReceiverThread receiver = new ReceiverThread(sender.getSocket());
        receiver.start();
    }
}      
 
class SenderThread extends Thread {
 
    private InetAddress serverIPAddress;
    private DatagramSocket udpClientSocket;
    private boolean stopped = false;
    private int serverport;
 
    public SenderThread(InetAddress address, int serverport) throws SocketException {
        this.serverIPAddress = address;
        this.serverport = serverport;
        this.udpClientSocket = new DatagramSocket();
        this.udpClientSocket.connect(serverIPAddress, serverport);
    }
    public void halt() {
        this.stopped = true;
    }
    public DatagramSocket getSocket() {
        return this.udpClientSocket;
    }
 
    public void run() {      
        //String nome = Client.Nome();
        try {    
        	byte[] data = new byte[1024];
        	data = "".getBytes();
        	DatagramPacket blankPacket = new DatagramPacket(data,data.length , serverIPAddress, serverport);
            udpClientSocket.send(blankPacket);
            BufferedReader inFromUser = new BufferedReader(new InputStreamReader(System.in));
            while (true){
                if (stopped)
                    return;
                //Listar Clientes
                
                String clientMessage = "Broadcast: "+ inFromUser.readLine();// adicionar nome no cliente message
                
 
                if (clientMessage.equals("."))
                    break;
 
                byte[] sendData = new byte[1024];
 
                sendData = clientMessage.getBytes();
 
                DatagramPacket sendPacket = new DatagramPacket(sendData, sendData.length, serverIPAddress, serverport);
 
                System.out.println("Mensagem"+clientMessage);
                udpClientSocket.send(sendPacket);
 
                Thread.yield();
            }
        }
        catch (IOException ex) {
            System.err.println(ex);
        }
    }
}   
 
class ReceiverThread extends Thread {
 
    private DatagramSocket udpClientSocket;
    private boolean stopped = false;
 
    public ReceiverThread(DatagramSocket ds) throws SocketException {
        this.udpClientSocket = ds;
    }
 
    public void halt() {
        this.stopped = true;
    }
 
    public void run() {
 
        byte[] receiveData = new byte[1024];
 
        while (true) {            
            if (stopped)
            return;
 
            DatagramPacket receivePacket = new DatagramPacket(receiveData, receiveData.length);
            System.out.println("Enviar:");
            try {
                udpClientSocket.receive(receivePacket);
                System.out.println("Recebido: ");
                String serverReply =  new String(receivePacket.getData(), 0, receivePacket.getLength());
 
                System.out.println("Resposta do Servidor " + serverReply+"\n");
 
                Thread.yield();
            } 
            catch (IOException ex) {
            System.err.println(ex);
            }
        }
    }
}