/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javapuro;

import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

/**
 *
 * @author eduardo
 */
public class JAVAPURO {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
        EntityManagerFactory fac = Persistence.createEntityManagerFactory("JAVAPUROPU");
        
        MyTableJpaController controller = new MyTableJpaController(fac);
        MyTable m = controller.findMyTable(2);
        List<MyTable> teste = controller.findMyTableEntities();
        System.out.println("Apenas uma busca pelo código:");
        System.out.println("--------------------------------------");
        System.out.println("id:" + m.getCodigo());
        System.out.println("Nome:" + m.getNome());
        System.out.println("Quantidade:" + m.getQuantidade());
        System.out.println("Preço:" + m.getPreco());
       
        System.out.println("\n\n--------------------------------------");

       for (MyTable a: teste){
           System.out.println("id:" + a.getCodigo());
           System.out.println("Nome:" + a.getNome());
           System.out.println("Quantidade:" + a.getQuantidade());
           System.out.println("Preço:" + a.getPreco());

       }
       
       System.out.println("\n\n Preço maior que 15");
       System.out.println("--------------------------------------");
       teste = controller.findGreaterParam();
       
       for (MyTable a: teste){
           System.out.println("id:" + a.getCodigo());
           System.out.println("Nome:" + a.getNome());
           System.out.println("Quantidade:" + a.getQuantidade());
           System.out.println("Preço:" + a.getPreco());

       }
       
       
       System.out.println("\n\n Preço maior que 26");
       teste = controller.findGreaterParamNum(26);
       
       for (MyTable a: teste){
           System.out.println("id:" + a.getCodigo());
           System.out.println("Nome:" + a.getNome());
           System.out.println("Quantidade:" + a.getQuantidade());
           System.out.println("Preço:" + a.getPreco());

       }
       
       
        
    }
    
}
