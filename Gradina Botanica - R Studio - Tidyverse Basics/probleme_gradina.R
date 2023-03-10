library(tidyverse)
library(lubridate)
library(dplyr)
########################################################################################################################
## Exercitiul 1 Grupare si filtrare - nu am avut inspiratie
########################################################################################################################

##1.1 Care este suma cheltuita pentru a plati ingrijitorii care au grija de parcel '1002'?
exercitiul1.1<-cheltuieli%>%
  inner_join(cheltuieli_ingrijitori)%>%
  inner_join(ingrijitori)%>%
  inner_join(ingrijitori_loturi)%>%
  inner_join(loturi)%>%
  filter(id_parcela == 1002)%>%
  summarise(sum(suma))


##1.2 Care este numarul de ingrijitori care au grija de lotul 10022?
exercitiul1.2<-ingrijitori_loturi%>%
  filter(id_lot == 10022)%>%
  summarise(nr_ingrijitori = n())

##1.3 Care sunt tratamentele care au fost incepute in perioada 2000-2002?
exercitiul1.3<-tratamente_specii%>%
  filter(year(data_incepere)>=2000 & year(data_incepere)<=2002)%>%
  select(id_tratament)

########################################################################################################################
## Exercitiul 2 Subinterogari in clauza having/from
########################################################################################################################

##2.1 Care este tratamentul/sunt tratamentele care s-a realizat in cele mai multe luni?
exercitiul2.1<-tratamente_specii%>%
  inner_join(tratamente)%>%
  group_by(id_tratament,tip_tratament)%>%
  summarise(id_tratament,tip_tratament,nr_luni = n())%>%
  distinct()%>%
  filter(nr_luni %in% (tratamente_specii%>%
                         inner_join(tratamente)%>%
                         group_by(id_tratament,tip_tratament)%>%
                         summarise(nr_luni = n())%>%
                         arrange(desc(nr_luni))%>%
                         head(1)))

##2.2 Care este parcela cu cei mai multi ingrijitori?
exercitiul2.2<-ingrijitori%>%
  inner_join(ingrijitori_loturi)%>%
  inner_join(loturi)%>%
  group_by(id_parcela)%>%
  transmute(id_parcela, nr_ingrijitori = n())%>%
  filter(nr_ingrijitori %in% (ingrijitori%>%
                               inner_join(ingrijitori_loturi)%>%
                               inner_join(loturi)%>%
                               group_by(id_parcela)%>%
                               transmute(nr_ingrijitori = n())%>%
                               arrange(desc(nr_ingrijitori))%>%
                               head(1)))%>%
  distinct()

##2.3 Care este specia/sunt speciile care se intalnesc pe cele mai multe loturi?
exercitiul2.3<-specii%>%
  inner_join(plante)%>%
  group_by(id_specie,denumire)%>%
  transmute(id_specie,denumire,nr_loturi = n())%>%
  distinct()%>%
  filter(nr_loturi %in% (specii%>%
                           inner_join(plante)%>%
                           group_by(id_specie,denumire)%>%
                           summarise(nr_loturi = n())%>%
                           arrange(desc(nr_loturi))%>%
                           head(1)))

########################################################################################################################
## Exercitiul 3 Expresii tabela si "tabele pivot"
########################################################################################################################

##3.1 Pentru fiecare specie, aratati primele 3 parcele, pe care numarul acestora este cel mai mare.
exercitiul3.1<-specii%>%
  inner_join(plante) %>%
  inner_join(loturi, by = c("id_lot"))%>%
  transmute(id_specie,denumire,id_parcela,id_planta)%>%
  group_by(denumire)%>%
  mutate(total_plante = n_distinct(id_planta))%>%
  transmute(id_specie,denumire,id_parcela,total_plante)%>%
  distinct()%>%
  top_n(n = 3,wt = id_specie)%>%
  arrange(desc(total_plante))%>%
  transmute(id_specie, denumire, id_parcela, number = paste("Parcela", row_number(), sep = ''), total_plante) %>%
  pivot_wider(names_from = (number), values_from = id_parcela, values_fill = NULL) %>%
  transmute(id_specie, "Denumire" = denumire,Parcela1, Parcela2, "NumarParcele" = total_plante) %>%
  arrange(desc(NumarParcele))
  

##3.2 Pentru fiecare tratament, aratati primele 3 specii, pe care s-a aplicat acesta de cele mai multe ori.
exercitiul3.2<-tratamente%>%
  inner_join(tratamente_specii) %>%
  inner_join(specii, by = c("id_specie"))%>%
  transmute(id_tratament,id_specie,denumire,)%>%
  group_by(id_tratament)%>%
  mutate(total_specii = n_distinct(id_specie))%>%
  transmute(id_tratament,denumire,total_specii)%>%
  distinct()%>%
  top_n(n = 3,wt = id_tratament)%>%
  arrange(desc(total_specii))%>%
  transmute(id_tratament, denumire, number = paste("Specie", row_number(), sep = ''), total_specii) %>%
  pivot_wider(names_from = (number), values_from = denumire, values_fill = NULL) %>%
  transmute(id_tratament,Specie1, Specie2,Specie3, "NumarParcele" = total_specii) %>%
  arrange(desc(NumarParcele))

##3.3 Pentru fiecare parcela, aratati primii 7 ingrijitori, in ordine alfabetica.
exercitiul3.3<-parcele%>%
  inner_join(loturi, by = c("id_parcela")) %>%
  inner_join(ingrijitori_loturi, by = c("id_lot"))%>%
  inner_join(ingrijitori, by = c("id_ingrijitor"))%>%
  transmute(id_parcela,id_ingrijitor,nume)%>%
  group_by(id_parcela)%>%
  mutate(total_ingrijitori = n_distinct(id_ingrijitor))%>%
  transmute(id_parcela,nume,total_ingrijitori)%>%
  distinct()%>%
  top_n(n = -7,wt = nume)%>%
  transmute(id_parcela, nume, number = paste("Ingrijitor", row_number(), sep = ''), total_ingrijitori) %>%
  pivot_wider(names_from = (number), values_from = nume, values_fill = NULL) %>%
  transmute(id_parcela,Ingrijitor1, Ingrijitor2 ,Ingrijitor3,Ingrijitor4,Ingrijitor5,Ingrijitor6,Ingrijitor7, "Numar_Ingrijitori" = total_ingrijitori) %>%
  arrange(desc(Numar_Ingrijitori))

########################################################################################################################
## Exercitiul 4 Interogari recursive - NU EXISTA RECURSIVITATE
########################################################################################################################

##4,1 Aratati nivelul ierarhic al fiecarui angajat

##4.2 Extrageti toti sefii ingrijitorului 'Ingrijitor920'.

##4.3 Pentru fiecare specie, afisati intr-un singur string, parcelele pe care aceasta se afla.
exercitiul4.3<-specii%>%
  inner_join(plante)%>%
  inner_join(loturi, by = c("id_lot"))%>%
  select(id_specie,denumire,id_parcela)%>%
  distinct()%>%
  group_by(id_specie,denumire)%>%
  mutate(nr_parcele = row_number())%>%
  summarise(parcele = paste(paste0(nr_parcele,":",id_parcela), collapse = '; '))%>%
  ungroup()