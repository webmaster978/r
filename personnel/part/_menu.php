 <div class="main-sidebar-nav default-navigation">
            <div class="nano">
                <div class="nano-content sidebar-nav">
				     
					<div class="card-body border-bottom text-center nav-profile">
                        <strong>GESTION PERSONNEL</strong>
						<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                        
                        <img alt="profile" class="margin-b-10  " src="../avatars/<?= $user_infos->photo; ?>" width="80">
                        <p class="lead margin-b-0 toggle-none"><?= ucwords($user_infos->nom_complet); ?></p>
                        <p class="text-muted mv-0 toggle-none"><?= ucwords($user_infos->designation); ?></p>						
                    </div>
					
                    <ul class="metisMenu nav flex-column" id="menu">
                        <li class="nav-heading"><span>MAIN</span></li>
						<li class="nav-item active"><a class="nav-link" href="dashboard"><i class="fa fa-home"></i> <span class="toggle-none">Dashboard</span></a></li>						
                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i> <span class="toggle-none">Agent <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="agent">Nos agents</a></li>
                                <li class="nav-item"><a class="nav-link" href="docs">Dossiers</a></li>
                                <li class="nav-item"><a class="nav-link" href="config">Configuration</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-folder-o"></i> <span class="toggle-none">Mes donnees <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="#">Mes taches</a></li>
                                <li class="nav-item"><a class="nav-link" href="doc">Dossier</a></li>
                                <li class="nav-item"><a class="nav-link" href="demandes">demandes</a></li>
                                <li class="nav-item"><a class="nav-link" href="conges">Conges</a></li>
                                <li class="nav-item"><a class="nav-link" href="presence">Presences</a></li>
                                <li class="nav-item"><a class="nav-link" href="tache">Evenements</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-folder-o"></i> <span class="toggle-none">Offres <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="offres">Offres</a></li>
                                <li class="nav-item"><a class="nav-link" href="suivie">Candidatures</a></li>
                               
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-folder-o"></i> <span class="toggle-none">Cas sociaux <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="cas">Cas sociaux</a></li>
                                <li class="nav-item"><a class="nav-link" href="sous">mes souscription</a></li>
                               
                            </ul>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="comm" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="toggle-none">Communiquer</a> 
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-building"></i> <span class="toggle-none">Presences<span class="fa arrow"></span></span></a>

                            <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                                <!-- <li class="nav-item"><a class="nav-link" href=javascript:void(0); onclick=maFonction()>Lien</a></li> -->
                                <li class="nav-item"><a class="nav-link" href="qr/">Nouvelle</a></li>
                                <li class="nav-item"><a class="nav-link" href="rapport">Presences journaliere</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Rapport</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-money"></i> <span class="toggle-none">Salaire<span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                                <li class="nav-item"><a class="nav-link" href="#">Nouveau</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">avances</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Rapport</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-codepen"></i> <span class="toggle-none">Cas sociaux<span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                                <li class="nav-item"><a class="nav-link" href="cass">Nouveau</a></li>
                                <li class="nav-item"><a class="nav-link" href="souscrit">Souscripteurs</a></li>
                                
                                
                            </ul>
                        </li>
                      
                        <li class="nav-item">
                           <a class="nav-link" href="comm" aria-expanded="false"><i class="fa fa-envelope"></i> <span class="toggle-none">Communiquer</a> 
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-rocket"></i> <span class="toggle-none">Offres<span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                                <li class="nav-item"><a class="nav-link" href="offre">Offres d'emploie</a></li>
                                <li class="nav-item"><a class="nav-link" href="candidat">Candidatures</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-money"></i> <span class="toggle-none">Conger<span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                                <li class="nav-item"><a class="nav-link" href="demande">Demandes</a></li>
                                
                                <li class="nav-item"><a class="nav-link" href="conge">Conger</a></li> 
                                <li class="nav-item"><a class="nav-link" href="conge">Agents en conger</a></li> 
                            </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="tache" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="toggle-none">Taches</a> 
                        </li>
                        

                        
                    </ul>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function maFonction()
           {
           
            
            $(document).ready(function() {    
    function calculateTime() { 
        var hourDiff = 
        parseInt($("select[name='timestart']").val().split(':')[0],10) -         
        parseInt($("select[name='timestop']").val().split(':')[0],10);

        $("p").html("<b>Hour Difference:</b> " + hourDiff )         
    }
    $("select").change(calculateTime);
    calculateTime();
});


           return false;
            }
        </script>
