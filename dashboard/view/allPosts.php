<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <?php if(isset($message)){  ?>
                <div class="alert alert-dismissible alert-secondary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    
                        <?php echo $message; ?>
                    
                </div>
            <?php } ?>

            <table class="table table-hover table-bordered table-responsive-sm table-sm bg-light">
                <thead class="bg-info text-white">
                    <th>Titre du billet</th>
                    <th>Date de publication</th>
                    <th>Dernière modification</th>
                    <th>Nb commentaires</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php

                    foreach ($listPosts as $post){ ?>
                        <tr>
                            <td><?php echo $post->getTitle() ?></td>
                            <td><?php echo date("d/m/Y H:i", strtotime($post->getCreatedAt())) ; ?></td>
                            <td><?php if(!empty($post->getUpdateAt())){echo date("d/m/Y H:i", strtotime($post->getUpdateAt())) ;}  ?></td>
                            <td><?php echo getCountCommentByPost($post->getId())[0] ?></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="../index.php?action=post&id=<?php echo $post->getId();?>">Voir</a>
                                <a class="btn btn-sm btn-warning" href="index.php?action=editPost&id=<?php echo $post->getId();?>">Modifier</a>
                                <a class="btn btn-sm btn-danger btn-delete" href="" data-toggle="modal" data-target="#modalDelete<?php echo $post->getId();?>" >Supprimer</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modalDelete<?php echo $post->getId();?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmer la suppression</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Confirmez-vous la suppression du billet ?
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-sm btn-success" href="index.php?action=deletePost&id=<?php echo $post->getId();?>">Confirmer</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>                
                                </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>