# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
    config.vm.box = "precise32"
    config.vm.box_url = "http://files.vagrantup.com/precise32.box"

    config.vm.provision :shell, :path => "./vagrant-provision.sh", :privileged => true

    config.vm.synced_folder ".", "/vagrant"
    config.vm.synced_folder "./storage", "/vagrant/storage", owner: 'vagrant', group: 'www-data', mount_options: ["dmode=777,fmode=777"]
    
    config.vm.network "private_network", ip: "192.168.33.19"
    config.vm.network "forwarded_port", guest: 35729, host: 35729
    config.ssh.forward_agent = true
end