VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "gighub.local"
  config.vm.network :private_network, ip:"33.33.33.47"

  config.vm.provision "ansible" do |ansible|
    ansible.inventory_path = "vagrant/vagrant"
    ansible.playbook = "vagrant/provision.yml"
    ansible.limit = "all"
  end

  config.vm.synced_folder ".", "/var/www/gighub", :nfs => true

  config.vm.provider :virtualbox do |vb|
        # Properly configure the vm to use the available amount of cores
        vb.customize ["modifyvm", :id, "--cpus", `#{RbConfig::CONFIG['host_os'] =~ /darwin/ ? 'sysctl -n hw.ncpu' : 'nproc'}`.chomp]
        vb.customize ["modifyvm", :id, "--ioapic", "on"]

        vb.customize ["modifyvm", :id, "--memory", 2048]
        vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
    end
end
