<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            利用者情報
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="px-3 py-6">
                        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                            <div class="border-t">
                                @foreach($users as $user)
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">氏名</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">メールアドレス</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">電話番号</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $user->tel }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">郵便番号</dt>
                                        @php
                                            $zipcode = str_split($user->zip, 3);
                                        @endphp
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $zipcode[0].'-'.$zipcode[1].$zipcode[2] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">住所</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $user->pref.$user->town.$user->address }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">誕生日</dt>
                                        @php
                                            $birthday = date('Y年m月d日' ,strtotime($user->birthday));
                                        @endphp
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $birthday }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">性別</dt>
                                        @php
                                            if ($user->gender==0){$gender = '男性';}
                                            elseif($user->gender==1){$gender = '女性';}
                                            else{$gender = 'その他';}
                                        @endphp
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $gender }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">パスワード</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">****************</dd>
                                    </div>
                                </dl>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


