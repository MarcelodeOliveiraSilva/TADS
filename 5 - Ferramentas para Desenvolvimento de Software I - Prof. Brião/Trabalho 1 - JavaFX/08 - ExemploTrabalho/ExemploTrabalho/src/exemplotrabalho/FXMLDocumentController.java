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
    
    @FXML private TextField LabelCodigo;
    @FXML private TextField LabelProduto;
    @FXML private TextField LabelQuant;
    @FXML private TextField LabelPrecoUnit;
    @FXML private TextField LabelPrecoTotal;
    @FXML private TextArea myTA;
    @FXML private Label labelMaiorPreco;
    @FXML private Label labelMenorPreco;
    
    
    
    FileWriter fw;
    FileReader fr;
    double menorPrecoUnitario =99999999.0;
    double maiorPrecoUnitario=0.0;
    String maiorprodutoAtual=" ";
    String menorprodutoAtual=" ";
    
    @FXML
    private void handleButtonIncluirAction(ActionEvent event) {
        
        System.out.println("Incluindo dados no arquivo produtos.txt...");
        String data=" ";
        
        data = LabelCodigo.getText() + ";" + LabelProduto.getText() + ";" 
                + LabelQuant.getText() + ";" + LabelPrecoUnit.getText() + "\n";
        System.out.println(data);
        Double precoTotal = 0.0;
        precoTotal = Double.parseDouble(LabelQuant.getText()) * Double.parseDouble(LabelPrecoUnit.getText());
        LabelPrecoTotal.setText(String.valueOf(precoTotal));
  
    
        try {
             fw = new FileWriter("produtos.txt",true);
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
        double preco = 0.0;
        double precoTotal=0.0;
        System.out.println("Carregando dados do arquivo produtos.txt...");
        myTA.clear();
          try{
                fr = new FileReader("produtos.txt");
                BufferedReader br = new BufferedReader(fr);
                String s;
                
                while((s = br.readLine())!=null) {
                     System.out.println(s);
                     String campos[] = s.split(";");
                     for (String i:campos)
                        myTA.appendText(i + "\t\t");
                     
                     precoTotal = Double.parseDouble(campos[2]) *  
                             Double.parseDouble(campos[3]);
                     myTA.appendText(String.valueOf(precoTotal));
                     myTA.appendText("\n");
                     preco = Double.parseDouble(campos[3]);
                     if (preco > maiorPrecoUnitario){
                         maiorPrecoUnitario = preco;
                         maiorprodutoAtual = campos[1];
                     }
                     if (preco < menorPrecoUnitario){
                         menorPrecoUnitario = preco;
                         menorprodutoAtual = campos[1];
                     }
                                          
                     
                }
                
                labelMaiorPreco.setText(maiorprodutoAtual);
                labelMenorPreco.setText(menorprodutoAtual);
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
    
}
