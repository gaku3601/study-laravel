### [step1] dockerでの開発環境の起動
以下コマンドを実行する。
```
[コンテナ郡の起動]
docker-compose up -d

[Laravel依存ライブラリのinstall]
docker-compose exec php composer update
```

http://localhost にアクセスしLaravelの初期画面が出れば成功。  
[参考文献]  
https://qiita.com/A-Kira/items/1c55ef689c0f91420e81  