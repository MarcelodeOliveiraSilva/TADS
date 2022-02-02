/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javapuro;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author eduardo
 */
@Entity
@Table(name = "my_table")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "MyTable.findAll", query = "SELECT m FROM MyTable m")
    , @NamedQuery(name = "MyTable.findByCodigo", query = "SELECT m FROM MyTable m WHERE m.codigo = :codigo")
    , @NamedQuery(name = "MyTable.findByNome", query = "SELECT m FROM MyTable m WHERE m.nome = :nome")
    , @NamedQuery(name = "MyTable.findByQuantidade", query = "SELECT m FROM MyTable m WHERE m.quantidade = :quantidade")
    , @NamedQuery(name = "MyTable.findByPreco", query = "SELECT m FROM MyTable m WHERE m.preco = :preco")
    , @NamedQuery(name = "MyTable.findGreaterParam", query = "SELECT m FROM MyTable m WHERE m.preco > 15")
    , @NamedQuery(name = "MyTable.findGreaterParamNum", query = "SELECT m FROM MyTable m WHERE m.preco > :valor")
})
public class MyTable implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "codigo")
    private Integer codigo;
    @Basic(optional = false)
    @Column(name = "nome")
    private String nome;
    @Basic(optional = false)
    @Column(name = "quantidade")
    private int quantidade;
    @Basic(optional = false)
    @Column(name = "preco")
    private double preco;

    public MyTable() {
    }

    public MyTable(Integer codigo) {
        this.codigo = codigo;
    }

    public MyTable(Integer codigo, String nome, int quantidade, double preco) {
        this.codigo = codigo;
        this.nome = nome;
        this.quantidade = quantidade;
        this.preco = preco;
    }

    public Integer getCodigo() {
        return codigo;
    }

    public void setCodigo(Integer codigo) {
        this.codigo = codigo;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public int getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    public double getPreco() {
        return preco;
    }

    public void setPreco(double preco) {
        this.preco = preco;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (codigo != null ? codigo.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof MyTable)) {
            return false;
        }
        MyTable other = (MyTable) object;
        if ((this.codigo == null && other.codigo != null) || (this.codigo != null && !this.codigo.equals(other.codigo))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "javapuro.MyTable[ codigo=" + codigo + " ]";
    }
    
}
