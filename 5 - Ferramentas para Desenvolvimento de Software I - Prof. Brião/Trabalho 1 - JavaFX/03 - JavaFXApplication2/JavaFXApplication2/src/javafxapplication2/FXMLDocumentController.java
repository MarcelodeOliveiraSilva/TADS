/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafxapplication2;

import java.io.File;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.stage.FileChooser;


/**
 *
 * @author eduardo
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML private Label label;
    @FXML private CheckBox check;
    @FXML private ChoiceBox filler;
    @FXML private DatePicker data_label; 
    @FXML private ListView MyList;
    @FXML private ProgressBar pg;
    @FXML private RadioButton r1;
    @FXML private RadioButton r2;
    @FXML private TextField TextAreaNome;
    @FXML private Label PutLabel;
    @FXML private Label LabelLangBeGet;
    @FXML private ToggleGroup tg;
    @FXML private Label LabelDataPicker;
    @FXML private Label label_file;

    
    @FXML
    private void handleButtonAction(ActionEvent event) {
        System.out.println("You clicked me!");
        label.setText("Hello World!");
        if (check.isSelected()){
            label.setText("Hello World! CheckBOX!!!");
        } 
         System.out.println(filler.getValue().toString());
    }
    
    
    @FXML 
     private void handleGetNameButtonAction(ActionEvent event) {
        System.out.println("GetNameButton pressed!");
        PutLabel.setText(" String " + TextAreaNome.getText() + " recebida!");
     
    }
     
     
     @FXML 
     private void handleSetLanguageButton(ActionEvent event) {
        System.out.println("SetLanguageButton pressed!");
        LabelLangBeGet.setText(r1.isSelected()? "JAVA!!!" : "C++!!!");
        PutLabel.setText(" String " + TextAreaNome.getText() + " recebida!");
     
    }
    
     @FXML 
     private void handleDataPicker(ActionEvent event){
         MyList.getItems().add("Data: " + data_label.getValue().toString());
     }
     
     
     @FXML 
     private void handleButtonGetItemFromList(ActionEvent event){
         LabelDataPicker.setText(MyList.getSelectionModel().getSelectedItem().toString());
     }
     
     @FXML
     private void menuItemCloseOnAction(ActionEvent event){
         System.exit(0);
     }
     
     @FXML
     private void menuItemOpenOnAction(ActionEvent event){
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Open Resource File");
        File fc = fileChooser.showOpenDialog(null);
        if (fc == null) System.out.println("Nenhum arquivo selecionado!");
        else{
            System.out.println("Arquivo selecionado: "+ fc.getName());
            label_file.setText("Filename: " + fc.getName());
        }
        
     }

     
       
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        filler.getItems().add("Choice 1");
        filler.getItems().add("Choice 2");
        filler.getItems().add("Choice 3");
        tg = new ToggleGroup();
        r1.setToggleGroup(tg);
        r1.setSelected(true);
        r2.setToggleGroup(tg);
        pg.setProgress(0.25f);
        
    }    
    
}
