package one.digitalinnovation.gof.factory;

import one.digitalinnovation.gof.model.Endereco;
import one.digitalinnovation.gof.service.ViaCepService;

import one.digitalinnovation.gof.model.EnderecoRepository;

public class EnderecoFactory {

    private final ViaCepService viaCepService;
    private final EnderecoRepository enderecoRepository;

    public EnderecoFactory(ViaCepService viaCepService, EnderecoRepository enderecoRepository) {
        this.viaCepService = viaCepService;
        this.enderecoRepository = enderecoRepository;
    }

    public Endereco obterEndereco(String cep) {
        return enderecoRepository.findById(cep).orElseGet(() -> {
            Endereco novoEndereco = viaCepService.consultarCep(cep);
            enderecoRepository.save(novoEndereco);
            return novoEndereco;
        });
    }
}