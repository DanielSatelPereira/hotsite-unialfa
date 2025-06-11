package Eventos.Palestra.Model;

public class Evento {
    private int id;
    private String nome;
    private String data;
    private String local;
    private String descricao;

    public Evento() {}

    public Evento(int id, String nome, String data, String local, String descricao) {
        this.id = id;
        this.nome = nome;
        this.data = data;
        this.local = local;
        this.descricao = descricao;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public String getLocal() {
        return local;
    }

    public void setLocal(String local) {
        this.local = local;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }
}

