package jhonatan.placido.model;

public class Evento {

    private int id;
    private String titulo;
    private String descricao;
    private String data;
    private String hora;
    private String local;

    // Construtor com ID
    public Evento(int id, String titulo, String descricao, String data, String hora, String local) {
        this.id = id;
        this.titulo = titulo;
        this.descricao = descricao;
        this.data = data;
        this.hora = hora;
        this.local = local;
    }

    // Construtor sem ID (usado para inserção)
    public Evento(String titulo, String descricao, String data, String hora, String local) {
        this.titulo = titulo;
        this.descricao = descricao;
        this.data = data;
        this.hora = hora;
        this.local = local;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getTitulo() { return titulo; }


    public String getDescricao() { return descricao; }


    public String getData() { return data; }


    public String getHora() { return hora; }


    public String getLocal() { return local; }



}


