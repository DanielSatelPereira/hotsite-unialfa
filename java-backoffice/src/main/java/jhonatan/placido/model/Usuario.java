package jhonatan.placido.model;

public class Usuario {
    private int id;
    private int ra;
    private String nome;
    private String email;
    private String senha;
    private int tipo;

    // Construtor com ID (para leitura/edição)
    public Usuario(int id, int ra, String nome, String email, String senha, int tipo) {
        this.id = id;
        this.ra = ra;
        this.nome = nome;
        this.email = email;
        this.senha = senha;
        this.tipo = tipo;
    }

    // Construtor sem ID (para inserção)
    public Usuario(int ra, String nome, String email, String senha, int tipo) {
        this.ra = ra;
        this.nome = nome;
        this.email = email;
        this.senha = senha;
        this.tipo = tipo;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getRa() { return ra; }


    public String getNome() { return nome; }


    public String getEmail() { return email; }


    public String getSenha() { return senha; }


    public int getTipo() { return tipo; }


}
