class mysql {

  # root mysql password
  $mysqlpw = "d3v0p5"
  $user = "baboon_user"
  $password = "an055apa55"
  $db = "baboon_mondaysoccer"

  # install mysql server
  package { "mysql-server":
    ensure => present,
    require => Exec["apt-get update"]
  }

  #start mysql service
  service { "mysql":
    ensure => running,
    require => Package["mysql-server"],
  }

  # set mysql password
  exec { "set-mysql-password":
    unless => "mysqladmin -uroot -p$mysqlpw status",
    command => "mysqladmin -uroot password $mysqlpw",
    require => Service["mysql"],
  }

  exec { "create-database":
    unless => "mysql -u$user -p$password $db",
    command => "mysql -uroot -p$mysqlpw -e \"create database $db; grant all on $db.* to $user@localhost identified by '$password';\"",
    require => [Service["mysql"], Exec["set-mysql-password"]],
  }

  exec { "import mysql":
    command => "mysql -u $user -p$password $db < /home/vagrant/mondaysoccer_ws/database/mondaysoccer.sql",
    require => [Service["mysql"], Exec["create-database"]],
  }
}
