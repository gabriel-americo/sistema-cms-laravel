@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Cadastro
                    </h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Ideia</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Cadastro</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Adicionar Ideia</h3>
                        </div>
                    </div>

                    <form class="form" action="{{ route('ideias.store') }}" method="POST">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nome da Arte</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="nome"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Nome da Arte" value="{{ old('nome') }}">
                                            @error('nome')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Criador da Arte</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="text" name="criador"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Criador da Arte" value="{{ old('criador') }}">
                                    @error('criador')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Descrição</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <textarea name="descricao" id="ckeditor" class="form-control form-control-solid rounded-3" rows="4">{{ old('descricao') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Data do Inicio</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="date" name="data_inicio"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ old('data_inicio') }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Data da Entrega</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="date" name="data_entrega"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ old('data_entrega') }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Data do Lançamento</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="date" name="data_lancamento"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ old('data_lancamento') }}">
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="d-flex flex-column mb-15 fv-row">
                                <div class="fs-5 fw-bold form-label mb-3">Briefing
                                    <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover"
                                        data-bs-html="true"
                                        data-bs-content="Cadastre as respostas para melhor entendimento da ideia.">
                                        <i class="ki-duotone ki-information fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="table-responsive">
                                    <table id="kt_create_new_custom_fields"
                                        class="table align-middle table-row-dashed fw-semibold fs-6 gy-5">
                                        <thead>
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="pt-0">Perguntas</th>
                                                <th class="pt-0">Respostas</th>
                                                <th class="pt-0 text-end">Remover</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($autoPergunta as $index => $pergunta)
                                                <tr>
                                                    <td>
                                                        <textarea class="form-control form-control-solid"
                                                            name="grupo_perguntas[{{ $index }}][pergunta]">{{ $pergunta }}</textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control form-control-solid"
                                                            name="grupo_perguntas[{{ $index }}][resposta]">{{ old('resposta') }}</textarea>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button"
                                                            class="btn btn-icon btn-flex btn-active-light-primary w-50px h-50px me-3"
                                                            data-kt-action="field_remove">
                                                            <i class="bi bi-trash3 fs-3"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <button type="button" class="btn btn-light-primary me-auto"
                                    id="kt_create_new_custom_fields_add">
                                    <i class="bi bi-plus"></i> Adicionar Pergunta
                                </button>
                            </div>

                            <div class="mb-10">
                                <label class="form-label fs-5 fw-bold mb-3">Status do desenho:</label>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            checked>
                                        <span class="form-check-label text-gray-600">Iniciar</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="status" value="1">
                                        <span class="form-check-label text-gray-600">Em Andamento</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="status" value="2">
                                        <span class="form-check-label text-gray-600">Concluído</span>
                                    </label>

                                    <span class="form-text text-muted">Escolha o status que esta seu projeto</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Resetar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax-status')
    <script src="{{ asset('assets/js/custom/apps/subscriptions/add/advanced.js') }}"></script>

    <script>
        class KTCkeditor {
            constructor() {
                this.editor = null;
                this.init();
            }

            // Função para inicializar o editor
            async init() {
                try {
                    this.editor = await ClassicEditor.create(document.querySelector('#ckeditor'));
                } catch (error) {
                    console.error("Erro ao inicializar o editor: ", error);
                }
            }
        }

        // Inicializa o editor quando o documento estiver pronto
        $(document).ready(() => new KTCkeditor());
    </script>
@endsection
