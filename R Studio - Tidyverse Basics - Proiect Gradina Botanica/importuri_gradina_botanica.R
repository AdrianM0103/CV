library(tidyverse)
library(RPostgres)
con <- dbConnect(RPostgres::Postgres(), dbname="Gradina_Botanica", user="postgres", host = 'localhost', password="")
tables <- dbGetQuery(con, 
                     "select table_name from information_schema.tables where table_schema = 'public'")
tables
cheltuieli <- dbReadTable(con, "cheltuieli" )
cheltuieli_ingrijitori <- dbReadTable(con, "cheltuieli_ingrijitori" )
cheltuieli_loturi <- dbReadTable(con, "cheltuieli_loturi" )
cheltuieli_tratamente <- dbReadTable(con, "cheltuieli_tratamente" )
ingrijitori <- dbReadTable(con, "ingrijitori" )
ingrijitori_loturi <- dbReadTable(con, "ingrijitori_loturi" )
loturi <- dbReadTable(con, "loturi" )
parcele <- dbReadTable(con, "parcele" )
plante <- dbReadTable(con, "plante" )
specii <- dbReadTable(con, "specii" )
tratamente <- dbReadTable(con, "tratamente" )
tratamente_specii <- dbReadTable(con, "tratamente_specii" )
save.image(file = 'gradinabotanica.RData')
rm(list = ls())
load("gradinabotanica.RData")
rm(con, drv, temp, i, tables )


