/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exemplotrabalho;

import java.io.*;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;

/**
 *
 * @author eduardo
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML private TextField LabelNjogos;
    @FXML private TextField LabelEquipe;
    @FXML private TextField LabelPontuacao;
    @FXML private TextField LabelNvitorias;
    @FXML private TextField LabelNempates;
    @FXML private TextField LabelNderrotas;
    @FXML private TextField LabelGolsPro;
    @FXML private TextField LabelGolsContra;
    @FXML private TextArea myTA;
    @FXML private Label labelMaiorNvitorias;
    @FXML private Label labelMaiorNgols;
    @FXML private Label labelMenorNgolsSofridos;
    @FXML private Label labelMaiorAproveitamento;
    
    
    
    
    FileWriter fw;
    FileReader fr;
    double maiorNvitorias=0;
    String maiorVitoriosa=" ";
    
    double maiorNgols=0;    
    String maiorGoleadora=" ";    
    
    double menorNgolsSofrido =9999.9;
    String maiorDefesa=" ";
    
    double aproveitamento=0.00;
    String maiorAproveitamento =" ";


    
    @FXML
    private void handleButtonIncluirAction(ActionEvent event) {
        
        System.out.println("Incluindo dados no arquivo produtos.txt...");
        String data=" ";
        
        data = LabelNjogos.getText() + ";" + LabelEquipe.getText() + ";" 
                + LabelPontuacao.getText() + ";" + LabelNvitorias.getText() + ";" 
                + LabelNempates.getText() + ";" + LabelNderrotas.getText() + ";" 
                + LabelGolsPro.getText() + ";" + LabelGolsContra.getText() + "\n";
        System.out.println(data);
 
    
        try {
             fw = new FileWriter("equipes.txt",true);
            BufferedWriter arq = new BufferedWriter(fw);
            arq.write(data);
            arq.close();
            System.out.println("Gravação feita com sucesso.");
        }catch(IOException e){
            System.out.println ("Houve um erro: " + e);
        }
        
    }
    
    
    
    @FXML
    private void handleButtonCarregarAction(ActionEvent event) {
        double nvitorias = 0;
        double gols = 0;
        double golssofridos = 0;
        double pontos = 0;
        double resultado = 0.00;
        
        System.out.println("Carregando dados do arquivo produtos.txt...");
        myTA.clear();
          try{
                fr = new FileReader("equipes.txt");
                BufferedReader br = new BufferedReader(fr);
                String s;
                
                while((s = br.readLine())!=null) {
                     System.out.println(s);
                     String campos[] = s.split(";");
                     for (String i:campos)
                        myTA.appendText(i + "\t\t");
                     
                     myTA.appendText("\n");
                     
                     nvitorias = Double.parseDouble(campos[3]);
                     if (nvitorias > maiorNvitorias){
                         maiorNvitorias = nvitorias;
                         maiorVitoriosa = campos[1];
                     }
                   
                     gols = Double.parseDouble(campos[6]);
                     if (gols > maiorNgols){
                         maiorNgols = gols;
                         maiorGoleadora = campos[1];
                     }
                     
                     golssofridos = Double.parseDouble(campos[7]);
                     if (golssofridos < menorNgolsSofrido){
                         menorNgolsSofrido = golssofridos;
                         maiorDefesa = campos[1];
                     }
                     
                     pontos = Double.parseDouble(campos[2]);
                     resultado = (pontos/30)*100;
                     if ( resultado > aproveitamento) {
                         aproveitamento = resultado;
                         maiorAproveitamento = campos[1];
                     }
       
                }
                
                labelMaiorNvitorias.setText(maiorNvitorias+" Vitórias, Equipe: "+maiorVitoriosa);
                labelMaiorNgols.setText(maiorNgols+" Gols, Equipe: "+maiorGoleadora);
                labelMenorNgolsSofridos.setText(menorNgolsSofrido+" Gols Sofridos, Equipe: "+maiorDefesa);
                labelMaiorAproveitamento.setText(maiorAproveitamento+" com "+aproveitamento+"% de aproveitamento");
                System.out.println("Dados Carregados com Sucesso");
    // TODO 
        
        }    catch (IOException e){
            System.out.println ("Houve um erro: " + e);

        }
        
    }
    
    
    @FXML
    private void handleMenuCloseAction(ActionEvent event) {
        System.exit(0);
    }
    
    
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      
    }

    private void labelMaiorNvitorias(String maiorVitoriosa) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
