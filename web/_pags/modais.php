<!--- MODAL NOVA PENDENCIA -->

    <div class="modal fade" id="modNovaPend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modNovaPend">Nova pendencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="form_nov_pend">

              <div class="form-row">
                <div class="col-md-8 mb-3">
                  <label autocomplete="off" for="ocPend">Cliente:</label>
                  <input type="text" autocomplete="off" class="form-control" id="name" placeholder="Ex: Distribuidora de telhados LTDA" value="" required clear>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-4 mb-3">
                  <label for="ocCondPgmt">Cond Pgmt</label>
                  <input type="text" class="form-control" id="ocCondPgmt" placeholder="28/42/56" value="">
                </div>

                <div class="col-md-4 mb-3">
                  <label for="pendData">Data</label>
                  <input type="text" class="form-control" id="pendData" placeholder="27/12/2021" value="" disabled>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="ocPend">O-C:</label>
                  <input type="text" class="form-control" id="ocPend" placeholder="Nº ordem de compra" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <div class="form-group">
                    <label for="selectStatus" require>Status</label>
                    <select class="form-control" id="selectStatus">
                      <option style="background-color: green;" value="1">Aberto</option>
                      <option style="background-color: yellow;" value="3">Aguar. Cliente</option>
                      <option style="background-color: orange;" value="2">Incompleto</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <label for="pendObs" class="col-form-label">Observações:</label>
                <textarea class="form-control" id="pendObs"></textarea>
              </div>

            </form>
            <div class="dropdown-divider"></div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" onclick="btn_salv_1();" class="btn btn-success">Salvar</button>
          </div>
        </div>
      </div>
    </div>


    <!--- Modal adiciona produto em nova pendencia-->

    <div class="modal fade" id="modalAddProdPend" tabindex="123121" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddProdPend">Adicionar item</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>

              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="ocPend">Nº linha:</label>
                  <input type="text" class="form-control" id="ocPendLinha" placeholder="Ex: 1" value="">

                </div>
                <div class="col-md-4 mb-3">
                  <label for="ocPend">O-C:</label>
                  <input type="text" class="form-control" id="ocPendProd" placeholder="Nº ordem de compra" value="" required>

                </div>
                <div class="col-md-4 mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="enableObsNovProd1">
                    <label class="form-check-label" for="enableObsNovProd">
                      Adcionar obs
                    </label>
                  </div>
                </div>
              </div>
              <div class="dropdown-divider"></div>

              <h6>Produto</h6>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="ocPend">Codigo Produto</label>
                  <input type="text" class="form-control" id="codnovProd" placeholder="Ex: 27.B013-18L" value="">

                </div>
                <div class="col-md-8 mb-3">
                  <label for="novPendDescri">Descrição:</label>
                  <input type="text" class="form-control" id="novPendDescri" placeholder="Ex: Amarelo segurança" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="ocQuantidade">Quantidade:</label>
                  <input type="text" class="form-control" id="quantnovProd" placeholder="Ex: 18L" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="ocValor">Valor:</label>
                  <input type="text" class="form-control" id="valornovProd" placeholder="Ex: 15,90" value="" required>
                </div>
              </div>

              <div id="pendObsdiv" class="form-group" style="visibility: hidden;">
                <label for="pendObsItemEdit" class="col-form-label">Observações:</label>
                <textarea class="form-control" id="pendObsItemEdit"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button id="btnAddItenNovPend" type="submit" class="btn btn-success">Adicionar</button>
          </div>
        </div>
      </div>
    </div>









<!--- MODAL Pendencia -->
<div class="modal fade" id="modPend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modPend">Pendencia <span id="pedCliente"></span></h5>

        <div type="button" id="abremodalInfo" style="position: absolute; right: 10%;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-lock" viewBox="0 0 16 16">
          <path d="M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0zM7 7v1h2V7a1 1 0 0 0-2 0zM6 9.3v2.4c0 .042.02.107.105.175A.637.637 0 0 0 6.5 12h3a.64.64 0 0 0 .395-.125c.085-.068.105-.133.105-.175V9.3c0-.042-.02-.107-.105-.175A.637.637 0 0 0 9.5 9h-3a.637.637 0 0 0-.395.125C6.02 9.193 6 9.258 6 9.3z"/>
          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
          </svg>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">


          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-md-8 mb-3">
              <label autocomplete="off" for="ocPend">Cliente:</label>
              <input type="text" autocomplete="off" class="form-control" id="nameLi" placeholder="Ex: Distribuidora de telhados LTDA" value="" required clear>

            </div>
            <div class="col-3 mb-3">
              <label for="ocPendLi">O-C:</label>
              <input type="text" class="form-control" id="ocPendLi" placeholder="Ordem de compra" value="">
            </div>
            <div class="col-4 mb-3">
              <label for="statusPendL">Status</label>
              <div class="input-group">
                <select class="form-control" id="statusPendL">
                  <option style="" value=""></option>
                  <option style="background-color: red;" value="0">Fechar</option>
                  <option style="background-color: green;" value="1">Aberto</option>
                  <option style="background-color: yellow;" value="3">Aguar. Cliente</option>
                  <option style="background-color: orange;" value="2">Incompleto</option>
                </select>
            </div>
          </div>
          <div class="col-4 mb-3">
            <label for="ocCondPgmt">Cond Pgmt</label>
            <input type="text" class="form-control" id="ocCondPgmtL" placeholder="Cond-Pgmt" value="">
          </div>
          </div>

          <div class="">
        </form>
          <div class="group">
            <label for="pendObsL" class="">Observações:</label>
            <textarea class="form-control" id="pendObsL" style="height:200px;"></textarea>
          </div>
          <div class="row">



          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="btn_atualizar">Atualizar</button>

      </div>
    </div>
  </div>
</div>


<!--- Modal editar item no modal -->

<div class="modal fade" id="modPendEditItem" tabindex="123121" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modPendEditItem">Item bla bla bla <span id="pendEdititem"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="ocNLinhaEdit">Nº linha:</label>
              <input type="text" class="form-control" id="ocNLinhaEdit" placeholder="Ex: 1" value="">

            </div>
            <div class="col-md-4 mb-3">
              <label for="ocPendItemEdit">O-C:</label>
              <input type="text" class="form-control" id="ocPendItemEdit" placeholder="Nº ordem de compra" value="" required>

            </div>
            <div class="col-md-4 mb-3">
              <label for="pendDataItemEdit">Aberto em:</label>
              <input type="text" class="form-control" id="pendDataItemEdit" placeholder="27/12/2021" value="" disabled>
            </div>
            <div class="col-md-4 mb-3">
              <label for="pendDataEditdata">Atualizado em:</label>
              <input type="text" class="form-control" id="pendDataEditdata" placeholder="28/12/2021" value="" disabled>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="pendObsEdit" class="col-form-label">Observações:</label>
            <textarea class="form-control" id="pendObsEdit"></textarea>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btnAtualizaItem" type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </div>
</div>


<!--- Modal exit Info usuarioPend-->

<div class="modal" style="" id="modPendViewInfo" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modPendEditItem">Informações <span id="pendEdititem"></span></h5>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="ocUserInfo">Usuario:</label>
              <input type="text" class="form-control" id="ocUserInfo" placeholder="Ex: 1" value="" disabled>

            </div>

            <div class="col-md-4 mb-3">
              <label for="pendDataItemEditView">Aberto em:</label>
              <input type="text" class="form-control" id="pendDataItemEditView" placeholder="27/12/2021" value="" disabled>
            </div>
            <div class="col-md-4 mb-3">
              <label for="pendDataEditdataView">Atualizado em:</label>
              <input type="text" class="form-control" id="pendDataEditdataView" placeholder="28/12/2021" value="" disabled>
            </div>

          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnfecharInfo" >Fechar</button>
      </div>
    </div>
  </div>
</div>
